@extends('layouts.app')
@section('content')

<section class="light-banner customer-account-page help_center" style="background-image: url('assets/images/bg_help.png')">
     <div class="container">
 
        <div class="row justify-content-center">
            <div class="col-md-5">
            <div class="search-input-design">
                <input type="search" placeholder="Search Quick Links / FAQs">
                <button class="search-btn"><img src="assets/images/icons/search.svg"></button>
             </div>
            </div>
     
            <div class="row quick_links_section  justify-content-center mt-5">
                <div class="col-xl-10 col-lg-12 col-md-12">
                <div class="form-headeing-second">
                  <h4 class="border-0 mb-0" style="font-size: 22px;">Quick Links<a href="#"><img src="assets/images/icons/links.svg" class="ms-3"/></a></h4>
                </div>
              <div class="row">
               <div class="col-md-4">
               <div class="cards_links">
                <div class="links_head">
                <h5><img src="assets/images/icons/customers.svg" class="me-3" />Customers</h5>
                <span class="btn_toggle  d-lg-none d-block"><i class="fas fa-chevron-right"></i></span>
                </div>
                <a href="#" class="link-design-2">Find a provider</a>
                <a href="#" class="link-design-2">Update payment information</a>
                <a href="#" class="link-design-2">Reschedule a cleaning</a>
                <a href="#" class="link-design-2">Verifying provider insurance</a>
                <a href="#" class="link-design-2">Cancel a cleaning</a>
                <a href="#" class="link-design-2">Cancel a recurring plan</a>
               </div>
               </div>
               <div class="col-md-4">
                <div class="cards_links">
                 <div class="links_head">
                 <h5><img src="assets/images/icons/providers.svg" class="me-3" />Providers</h5>
                 <span class="btn_toggle  d-lg-none d-block"><i class="fas fa-chevron-right"></i></span>
                 </div>
                 <a href="#" class="link-design-2">Post my services</a>
                 <a href="#" class="link-design-2">Change my availability</a>
                 <a href="#" class="link-design-2">Change locations served</a>
                 <a href="#" class="link-design-2">Add custom services</a>
                 <a href="#" class="link-design-2">Update payout information</a>
                 <a href="#" class="link-design-2">Add or remove team members</a>
                </div>
                </div>
                <div class="col-md-4">
                  <div class="cards_links">
                   <div class="links_head">
                   <h5><img src="assets/images/icons/services.svg" class="me-3" />After Service</h5>
                   <span class="btn_toggle  d-lg-none d-block"><i class="fas fa-chevron-right"></i></span>
                   </div>
                   <a href="#" class="link-design-2">Report an issue with a service/a>
                   <a href="#" class="link-design-2">Report an issue with a provider</a>
                   <a href="#" class="link-design-2">Request a refund</a>
                   <a href="#" class="link-design-2">Contact Us</a>
                  </div>
                  </div>
              </div>

              <div class="row top_question_section mt-5">
                <div class="form-headeing-second">
                  <h4 class="border-0 mb-0" style="font-size: 22px;">Top Questions<a href="#"><img src="assets/images/icons/questions.svg" class="ms-3"/></a></h4>
                </div>
              
              <div class="col-md-3">
               <div class="card_questions">
                <img src="assets/images/icons/start_service.svg"/>
                   <a href="{{route('terms-and-conditions')}}" class="">How do I start service</a>
               </div>
              </div>

              <div class="col-md-3">
                <div class="card_questions">
                 <img src="assets/images/icons/payment_method.svg"/>
                    <a href="#" class="">How can I change payment method</a>
                </div>
               </div>

               <div class="col-md-3">
                <div class="card_questions">
                 <img src="assets/images/icons/policy.svg"/>
                    <a href="#" class="">What is the refund policy?</a>
                </div>
               </div>

               <div class="col-md-3">
                <div class="card_questions">
                 <img src="assets/images/icons/insured.svg"/>
                    <a href="#" class="">Are providers insured?</a>
                </div>
               </div>

               <div class="col-md-3">
                <div class="card_questions">
                 <img src="assets/images/icons/custom_service.svg"/>
                    <a href="#" class="">What are the guidelines for custom services?</a>
                </div>
               </div>

               <div class="col-md-3">
                <div class="card_questions">
                 <img src="assets/images/icons/not_listed.svg"/>
                    <a href="#" class="">How do I request a service that isn’t listed?</a>
                </div>
               </div>

               <div class="col-md-3">
                <div class="card_questions">
                 <img src="assets/images/icons/clean_free.svg"/>
                    <a href="#" class="">Is Canary Clean free to use?</a>
                </div>
               </div>

               <div class="col-md-3">
                <div class="card_questions">
                 <img src="assets/images/icons/cancel_service.svg"/>
                    <a href="#" class="">How do I cancel service?</a>
                </div>
               </div>

               <div class="col-md-3">
                <div class="card_questions">
                 <img src="assets/images/icons/pay_cleaner.svg"/>
                    <a href="#" class="">How do I pay cleaners?</a>
                </div>
               </div>

               <div class="col-md-3">
                <div class="card_questions">
                 <img src="assets/images/icons/cleaner.svg"/>
                    <a href="#" class="">How are cleaners paid?</a>
                </div>
               </div>

               <div class="col-md-3">
                <div class="card_questions">
                 <img src="assets/images/icons/include.svg"/>
                    <a href="#" class="">What’s included with a service?</a>
                </div>
               </div>
              </div>

              <div class="row faq_section justify-content-center py-5">
               <div class="col-md-9">
                <h3 class="h3_faq">FAQs <img src="assets/images/icons/faq.svg" class="ms-3"/></h3>
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Pricing and Payments
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available. It is also used to temporarily replace text in a process called greeking, which allows designers to consider the form of a webpage or publication, without the meaning of the text influencing the design.</p>
                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful cholder before final copy is available. It is also used to temporarily replace text in a process called greeking, which allows designers to consider the form of a webpage or publication, without the meaning of the text influencing the design.</p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Badges and Reviews
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available. It is also used to temporarily replace text in a process called greeking, which allows designers to consider the form of a webpage or publication, without the meaning of the text influencing the design.</p>
                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful cholder before final copy is available. It is also used to temporarily replace text in a process called greeking, which allows designers to consider the form of a webpage or publication, without the meaning of the text influencing the design.</p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Insurance
                      </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available. It is also used to temporarily replace text in a process called greeking, which allows designers to consider the form of a webpage or publication, without the meaning of the text influencing the design.</p>
                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful cholder before final copy is available. It is also used to temporarily replace text in a process called greeking, which allows designers to consider the form of a webpage or publication, without the meaning of the text influencing the design.</p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingfour">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                        Support
                      </button>
                    </h2>
                    <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available. It is also used to temporarily replace text in a process called greeking, which allows designers to consider the form of a webpage or publication, without the meaning of the text influencing the design.</p>
                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful cholder before final copy is available. It is also used to temporarily replace text in a process called greeking, which allows designers to consider the form of a webpage or publication, without the meaning of the text influencing the design.</p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingfive">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                        Services
                      </button>
                    </h2>
                    <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available. It is also used to temporarily replace text in a process called greeking, which allows designers to consider the form of a webpage or publication, without the meaning of the text influencing the design.</p>
                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful cholder before final copy is available. It is also used to temporarily replace text in a process called greeking, which allows designers to consider the form of a webpage or publication, without the meaning of the text influencing the design.</p>
                      </div>
                    </div>
                  </div>

                </div>
               </div>
              </div>
                   
            </div>
        </div>
        
       </div>
     </div>
   </section>
   <script>
  $(document).ready(function(){
    $(".btn_toggle ").click(function(){
      $(".cards_links").toggleClass("active");
    });
  });
  </script>
@endsection