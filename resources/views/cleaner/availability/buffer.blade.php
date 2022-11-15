<div class="buffers_section">
  <form action="{{ route('cleaner.availability.buffer') }}" method="post">
    @csrf
    <h3>Buffer <span>(how much time you require between cleanings)</span></h3>
    <div class="set_minutes_row">
      <div class="minutes_labes">
        <label>Set Minutes</label>
        <div class="incremnt_decrmnt number for_alternative">
          <span class="minus">-</span>
          <input type="text" value="1" minimum="1" name="buffer">
          <span class="plus">+</span>
        </div>
      </div>
      <!-- <div class="btn_plus_minus">
        <button class="border-0 bg-none">-</button>
        <button class="border-0 bg-none">+</button>
      </div> -->
      <p class="p_text">Recommended setting: 30 minutes. Lower or raise over time if you find you have too much or little time between cleanings.</p>
    </div>
    <button type="submit" class="btn_blue ">Save</button>
  </form>
</div>