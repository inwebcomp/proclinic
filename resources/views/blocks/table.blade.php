<div class="container">

    <div role="table" class="table" aria-label="Адреса клиник">
        <div role="row" class="table__row table__row--head">
            <div role="cell" class="table__cell">
                Адреса клиник
                <span class="table__name-for-mobl">Клиники</span>
            </div>
            <div role="cell" class="table__cell">
                Часы работы
            </div>
            <div role="cell" class="table__cell">
                Электронная почта
            </div>
            <div role="cell" class="table__cell">
                Телефон
            </div>
        </div>

        @foreach ($rows as $clinic)
            <div role="row" class="table__row">
                <div role="cell" class="table__cell">
                    {{$clinic['address']}}
                </div>
                <div role="cell" class="table__cell">
                    {{$clinic['work_time']}}
                </div>
                <div role="cell" class="table__cell">
                    <a href="mailto:{{$clinic['email']}}" class="table__link-action">{{$clinic['email']}}</a>
                </div>
                <div role="cell" class="table__cell">
                    <a href="tel:{{$clinic['phone']}}" class="table__link-action">{{$clinic['phone']}}</a>
                </div>
            </div>
        @endforeach

    </div>
</div>
