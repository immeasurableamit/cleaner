<div>
    <div class="max_job_time_div border-bottom py-3 ">
        <div class="set-availity-desc">
          <p><strong>Max Jobs - Same Time</strong> number of jobs you can do at the same time - ex: if a team of four is split into two, enter “2”</p>
        </div>
        <div class="max_small_screen increament-decreament-forms">
          <span class="link-design-2 d-block d-md-none bold">Max Simultaneous Jobs</span>
          <div class="d-flex align-items-center">
            <div class="incremnt_decrmnt number for_alternative">
                <span class="minus" wire:click="action('minus')">-</span>
                <input type="text" wire:model="jobs">
                <span class="plus" wire:click="action('plus')">+</span>
            </div>
            <span class="ms-3 small-grey-text"> Default is 1</span>
          </div>
        </div>
        <button type="button" class="btn_blue mt-3" wire:click="store">Save</button>
    </div>
</div>
