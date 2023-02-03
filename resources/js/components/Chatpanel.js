import React, { useState, useEffect, useCallback, useRef } from 'react';
import ReactDOM from 'react-dom';
import { useForm } from "react-hook-form";
import axios from "axios";
import Moment from 'moment';
import InputEmoji from 'react-input-emoji';
import { defaultsDeep } from 'lodash';

const Chatpanel = () => {

	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
    const getUser = urlParams.get('user')

	const { register, handleSubmit, reset, formState: { errors } } = useForm();

	const [currentUser, setCurrentUser] = useState({});
	const [activeUser, setActiveUser] = useState({});

	const [msgList, setMsgList] = useState([]);

	const [userList, setUserList] = useState([]);
	const [userListData, setUserListData] = useState([]);
	const [message, setMessage] = useState([]);

	const [isActive, setIsActive] = useState(false);

	const [error, setError] = useState('');
	const [filesArray, setFilesArray] = useState([]);

	const [text, setText] = useState('');
	const [search, setSearch] = useState('');
	const [sending, setSending] = useState(false);
	const [page, setPage] = useState(1);
	const [lastPage, setLastPage] = useState(1);
	const [loadMore, setLoadMore] = useState(false);




	const messagesEndRef = useRef(null);

	useEffect((e) => {
		if(!loadMore){
			scrollToBottom(e);
		}
	}, [msgList]);


	useEffect(() => {
        loadUsers();
        subscribeToPusher();
        if(getUser){
			loadUserSlugId(getUser);
			loadChats(getUser);
		}
    }, []);






	const scrollToBottom = (e) => {
		//console.log(e)
		messagesEndRef.current?.scrollIntoView({ behavior: "smooth" })
	}

    function loadUsers(){
    	setError('');
        let token = document.querySelector('meta[name="csrf-token"]').content;
        fetch('/chat/users',{
            method:'POST',
            headers:{
                'Content-Type':'application/json',
                X_CSRF_TOKEN:token,
                'Accept':'application/json'
            }
        })
        .then(response => response.json())
        .then(dat => {
			setUserList(dat.listUsers);
			setUserListData(dat.listUsers);

			setCurrentUser(dat.currentUser);

        })
        .catch((error) => {
            console.error(error);
        });
    }


    function loadUserSlugId(id){
    	setError('');
        let token = document.querySelector('meta[name="csrf-token"]').content;
        fetch('/chat/users/?user='+id,{
            method:'POST',
            headers:{
                'Content-Type':'application/json',
                X_CSRF_TOKEN:token,
                'Accept':'application/json'
            }
        })
        .then(response => response.json())
            .then(dat => {
                // console.log(dat, "user listing");
			setUserList(dat.listUsers);
			setUserListData(dat.listUsers);

        	//setIsActive(getUser);
			setCurrentUser(dat.currentUser);

        })
        .catch((error) => {
            console.error(error);
        });
    }

    function loadChats(user_id){
    	setLoadMore(false);
    	setMsgList([]);
		setIsActive(user_id);
		setError('');

		var badgeCount = document.getElementsByClassName('badge-counter')[0];
		if(badgeCount){
			badgeCount.outerHTML = '';
		}

        let token = document.querySelector('meta[name="csrf-token"]').content;

        fetch('/chat/messages?rec_id='+user_id+'&page='+page,{
            method:'POST',
            headers:{
                'Content-Type':'application/json',
                X_CSRF_TOKEN:token,
                'Accept':'application/json'
            }
        })
        .then(response => response.json())
        .then(dat => {

        	setPage(dat.msg_list.current_page);
        	setLastPage(dat.msg_list.last_page);

            setMsgList(dat.msg_list.data.reverse());
            setActiveUser(dat.receiverUser);


			//set in localstorage
			localStorage.setItem('active_user', JSON.stringify(dat.receiverUser));
        })
        .catch((error) => {
            console.error(error);
        });
    }

    function onScrollLoadChats(){

    	setLoadMore(true);

		setError('');
		let nPage = page + 1;


    	let token = document.querySelector('meta[name="csrf-token"]').content;

        fetch('/chat/messages?rec_id='+isActive+'&page='+nPage,{
            method:'POST',
            headers:{
                'Content-Type':'application/json',
                X_CSRF_TOKEN:token,
                'Accept':'application/json'
            }
        })
        .then(response => response.json())
        .then(dat => {

            setMsgList(msgList => [...dat.msg_list.data.reverse(), ...msgList]);
        	setPage(dat.msg_list.current_page);
        	setLastPage(dat.msg_list.last_page);

        })
        .catch((error) => {
            console.error(error);
        });
    }


	function handleOnEnter(text) {
		//console.log("enter", text);
		formSubmit();
	}


	const onSubmit = async (data, e) => {
		e.preventDefault();

		formSubmit();
	};


	const stringValPatternValidation = stringVal => {
		return /\s/g.test(stringVal);
	};


	function formSubmit(){
		setError('');
		setLoadMore(false);

		//var regix = /^[ A-Za-z0-9_@./#&+-]*$/
		let created_at = Moment().format('MMMM Do YYYY, h:mm a');


		if(text.trim().length !== 0 || filesArray.length>0){
			setSending(true);
			let data = new Array();
			data['message'] = text;
			data['created_at'] = created_at;
			data['rec_id'] = activeUser.id;
			data['files_attached'] = filesArray;

			//console.log('data', data);

			//axios.post("/chat/messages/send", JSON.stringify(data))
			axios.post("/chat/messages/send", {
				message: text,
				created_at: created_at,
				rec_id: activeUser.id,
				files_attached: filesArray,
			})
			.then((response) => {
				setText('');
				setSending(false);
				setFilesArray([]);
			})
			.catch((error) => {
				console.error(error);
				setSending(false);
			});
		}
		else {
			setText('');
			setError('Message is required');
		}
	};





	const subscribeToPusher = useCallback(() => {
		var new_msg = [];
        var channel = pusher.subscribe('private-chat-'+user.id);

		channel.bind('App\\Events\\MessageEvent', function(d) {

			//loadUsers();

			//console.log(d)
			let active_user = JSON.parse(localStorage.getItem('active_user'));

			//checking sent message from sender side
            if(d.sender_id == user.id){
                if(active_user && active_user?.id){
                    if(active_user.id == d.rec_id){
                        //console.log('you---.', msgList);

						setMsgList(msgList => [...msgList, d])
                        //alert('you have sent message to this user.');
                    }
                }
            }

			//checking message has been received or not
            if(d.sender_id != user.id){
                if(active_user && active_user?.id){
                    if(active_user.id == d.sender_id){
                        //console.log('me---.', msgList);

						setMsgList(msgList => [...msgList, d])
                        //alert('you have sent message to this user 2.');
                    }
                }
                else{
                    alert('no active user, you got a new message : '+d.message);
                }
            }
		}.bind(this));

	}, []);




	function handleFileUpload(e){
        let files = e.target.files[0];
        setError('');

        const data = new FormData()
        data.append('files', files)

        axios.post("/files-upload", data)
        .then((response) => {
            if (response.status === 200) {

            	if(response.data.status=='failed'){
            		setError(response.data.errors.files[0]);
            	}
            	else {

					setFilesArray((filesArray) => [
						...filesArray,
						{
							name: response.data.name,
							mime: response.data.mime,
							is_image: response.data.is_image,
						},
					]);

            	}

            	document.getElementById("imageForm").value=null;
            }
        })
        .catch((error) => {
            console.error(error);
        });
    }

    function removeAttachment(index){
		var array = [...filesArray]; // make a separate copy of the array
		if (index !== -1) {
			array.splice(index, 1);
			setFilesArray(array);
		}
    }


	function searchInput(e){
        let search = e?.target?.value.toLowerCase();

        setSearch(search);
	}


	return (
		<>
		<div className="message_section">
			<div className="messages_left_section">
				<div className="msg_left_header">
		            <div className="card_chat">
	                  <img src={currentUser.profile_pic}/>
	                  <h4>{currentUser.name}</h4>
		                <span className="number">555-555-555</span>
	               </div>
	           	</div>


				<div className="mutiple_cards_chat">
		            <div className="serach_input">
					<input
						type="search"
						name="search"
						placeholder="Search"
						className="form-control"
						onChange={(e)=>searchInput(e)}
						/>
		            </div>
	           		<h4 className="h4_design border-0">Message</h4>

	           		{userList.length > 0 &&
						userList.filter(user => user.name.toLowerCase().match(search)).map(function (user, index) {
							return (
				            <div className={`card_chat ${isActive==user.id ? 'active' : ''}`} key={'user_'+user.id}>
				            	<a className="nav-link getmsgs" href="javascript:void(0);" onClick={()=>loadChats(user.id)} >
					                <img src={user.profile_pic} />
					                {/*<span className="r_time">15:26</span>*/}
					                <h4>{user.name}</h4>
					                {user.last_active_at &&
					                <span className="number">{user.online=='1' ? 'online' : 'Last seen '+ user.online_date }</span>
                					}

                					{user?.unread>0 &&
                					<span className="msg_number">{user.unread}</span>
                					}
            					</a>
			               </div>
							)
						})
					}

					{!(userList.length > 0) &&
						<div className="no-user">
							No user found
						</div>
					}

	           </div>
			</div>





			<div className="messages_right_section">

			{isActive &&
			<>
	             <div className="msg_right_header">
	                 <div className="card_chat">
	                  <img src={activeUser.profile_pic} />
	                  <h4>{activeUser.name}</h4>
	                  {activeUser.last_active_at &&
		                <span className="number">{activeUser.online=='1' ? 'online' : 'Last seen '+ activeUser.online_date }</span>
						}
	                 </div>

	                 <div class="bar_header_search d-none d-sm-flex">
	                  <input type="search" placeholder="Search" class="me-3" />
	                  <div class="dropdown msg_notification d-none d-sm-block">
	                    <button class="dropdown-toggle border-0 me-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
	                     <img src="assets/images/icons/notification.svg" />
	                     <span class="red_dot"></span>
	                    </button>
	                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
	                      <li><a class="dropdown-item" href="#">Action</a></li>
	                      <li><a class="dropdown-item" href="#">Another action</a></li>
	                      <li><a class="dropdown-item" href="#">Something else here</a></li>
	                    </ul>
	                  </div>
	                  {/* <div class="three_dots">
	                     <span>...</span>
	                  </div> */}
	                 </div>
	             </div>
	                             
	             <div className="right_chat">
	             	{page<lastPage &&
						<button type="button" onClick={()=>onScrollLoadChats()}>load more chats</button>
					}

					{msgList.length > 0 &&
						msgList.map(function (msgs, index) {
							let classNa = 'reciver_msg';
							let profile_pic = activeUser.profile_pic;
							let name = activeUser.name;
							if(msgs.sender_id===currentUser?.id){
								classNa = 'sender_msg';
								profile_pic = currentUser.profile_pic;
								name = currentUser.name;
							}

							let dateFrom = Moment().subtract(6,'d').format('YYYY-MM-DD');
							let ndateFrom = Moment(msgs.created_at).format('YYYY-MM-DD');
							console.log('dateFrom', dateFrom);

							let timeFor = Moment(msgs.created_at).format('L LT');
							if(ndateFrom >= dateFrom){
								timeFor = Moment(msgs.created_at).format('dddd LT');
							}

							return (
								<div className={classNa} key={index}>
				                  <div className="s_r_msg">
                      					<img src={profile_pic} />
				                     <div className="name_l_seen">
				                     	<h5 class="m_name">{name}</h5>
				                     	{msgs.created_at &&
				                     	<span className="l_seen">{timeFor}</span>
				                     	}
				                     </div>

				                     {msgs.message &&
				                     <p className="msg_p">{msgs.message}</p>
				                  	}
																			<div className='attachements-images'>

				                  	{msgs?.files?.length > 0 &&
										msgs.files.map(function (file, i) {
											return (
												<a key={i} className="attachment" target="_blank" href={`uploads/files/${file.name}`}>
													{file.is_image &&
														<img width="100" src={`uploads/files/${file.name}`} />
													}
													{!file.is_image &&
														<img width="100" src={`attachment.png`} />
													}
												</a>
											)
										})
									}
																			</div>

				                  </div>
				                </div>
							)
						})
					}


					{!loadMore &&
						<div ref={messagesEndRef}></div>
					}
					
	                
	             </div>


<div className='message_sender'>
				 {filesArray.length>0 &&
							<div className="attached-files">
							{filesArray.map(function (file, j) {
								return (
									<div className="file files_r" key={j}>
										<div className='img_gallery'>
										<a target="_blank" href={`uploads/files/${file.name}`}>
											{file.is_image &&
												<img width="100" src={`uploads/files/${file.name}`} />
											}
											{!file.is_image &&
												<img width="100" src={`attachment.png`} />
											}
										</a>
                                        <div className="btn btn-danger btn_cross" onClick={()=>removeAttachment(j)}>x</div>
									</div>
									</div>
								)
							})}
							</div>
						}
	             <form onSubmit={handleSubmit(onSubmit)}>

					{error &&
						<span className="red">{error}</span>
					}
		             <div className="msg_send_input_div">

		              	<InputEmoji
									value={text}
									onChange={setText}
									cleanOnEnter
									onEnter={handleOnEnter}
									placeholder="Type a message"
									/>

						<div className="galery_div">
			                <input
										type="file"
										name="image"
										onChange={(e)=>handleFileUpload(e)}
										id="msg_file"
									/>

			                <label htmlFor="msg_file" className="me-3"><img src="assets/images/gallery.svg"/></label>
			              </div>

		               <button type="submit" className="btn_send_msg" disabled={sending ? true : false}>
							{/*{sending && <i className="fa fa-spin fa-spinner"></i>}{' '}*/}Send
						</button>

		             </div>
	             </form>
				 </div>

	            

				
             </>
         	}
          </div>
        </div>


			

		</>
	);
}


export default Chatpanel;


if (document.getElementById('chat_panel_container')) {
    ReactDOM.render(<Chatpanel />, document.getElementById('chat_panel_container'));
}
