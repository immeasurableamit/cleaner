<div>
      <div class="form-group row">
        <label for="question" class="col-sm-2 col-form-label">Question</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="question" placeholder="Enter Question" wire:model="question">
          @error('question') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
      </div>
      <br>
      <div class="form-group row">
        <label for="answer" class="col-sm-2 col-form-label">Answer</label>
        <div class="col-sm-10" wire:ignore>
          <textarea class="form-control" id="answer" placeholder="Enter Answer" wire:model="answer"></textarea>
          @error('answer') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
      </div>
      <br>
      <div class="form-group">
        <button type="submit" wire:click.prevent="store()" class="btn_blue">Submit</button>
      </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    @push('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#answer'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                @this.set('answer', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    @endpush

</div>
