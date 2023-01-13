<div>
    <div class="buffers_section">
        <h3>Buffer <span>(how much time you require between cleanings)</span></h3>
        <div class="set_minutes_row">
          <div class="minutes_labes">
            <label>Set Minutes</label>
            <div class="incremnt_decrmnt number for_alternative">
                <span class="minus" wire:click="action('minus')">-</span>
                <input type="text" wire:model="buffer">
                <span class="plus" wire:click="action('plus')">+</span>
            </div>
          </div>
          <p class="p_text">Recommended setting: 30 minutes. Lower or raise over time if you find you have too much or little time between cleanings.</p>
        </div>
        <button type="button" class="btn_blue " wire:click="store">Save</button>
    </div>
</div>
