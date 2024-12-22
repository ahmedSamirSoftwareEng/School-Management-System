<div>
    <div>
        <div class="card card-statistics mb-30 shadow-lg border-0">
            <div class="card-body">
                <div class="card-title fw-semibold text-primary mb-4" style="font-size: 2rem;">
                    {{ $data[$counter]->title }}
                </div>

                @foreach (explode('-', $data[$counter]->answers) as $index => $answer)
                    <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio{{ $index }}" name="customRadio"
                            class="custom-control-input" >
                        <label class="custom-control-label"
                            for="customRadio{{ $index }}" wire:click="nextQuestion({{ $data[$counter]->id }}, {{ $data[$counter]->score }}, '{{ $answer }}', '{{ $data[$counter]->right_answer }}')">{{ $answer }}</label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
