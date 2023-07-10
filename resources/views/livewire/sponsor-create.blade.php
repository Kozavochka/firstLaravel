<form wire:submit.prevent="submitForm">
    @foreach($sponsors as $sponsor)
        <div class="card card-body" style="max-width: 300px !important">
            <div class="form-group">
                <div class="mb-3">
                    <label for="name.{{$loop->index}}">Имя:</label>
                    <input type="text" wire:model="sponsors.{{$loop->index}}.name" id="name.{{$loop->index}}">
                </div>
            </div>

            <div class="form-group">
                <div class="mb-3">
                    <label for="type.{{$loop->index}}">Тип:</label>
                    <input type="text" wire:model="sponsors.{{$loop->index}}.type" id="type.{{$loop->index}}">
                </div>
            </div>
            <div class="form-group">
                <div class="mb-3">
                    <label for="location.{{$loop->index}}">Местоположение</label>
                    <input type="text" wire:model="sponsors.{{$loop->index}}.location" id="location.{{$loop->index}}">
                </div>
            </div>

        </div>
    @endforeach
    <button type="submit">Submit</button>
    <button type="button" wire:click="newSponsor" class="btn-success">Добавить</button>
</form>

