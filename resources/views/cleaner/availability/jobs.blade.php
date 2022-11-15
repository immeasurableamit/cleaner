<div class="max_job_time_div border-bottom py-3 ">
  
  
  <form action="{{ route('cleaner.availability.jobs') }}" method="post">
    @csrf
    <div class="set-availity-desc">
      <p><strong>Max Jobs - Same Time</strong> number of jobs you can do at the same time - ex: if a team of four is split into two, enter “2”</p>
    </div>
    <div class="max_small_screen increament-decreament-forms">
      <span class="link-design-2 d-block d-md-none bold">Max Simultaneous Jobs</span>
      <div class="d-flex align-items-center">
        <div class="incremnt_decrmnt number for_alternative">
          <span class="minus">-</span>
          <input type="text" value="1" minimum="1" name="jobs">
          <span class="plus">+</span>
        </div>
        <span class="ms-3 small-grey-text"> Default is 1</span>
      </div>
    </div>
    <button type="submit" class="btn_blue mt-3">Save</button>
  </form>

</div>