    <div class="container doctor-info">
        <div class="doctor-info__content">
            <h2 class="title doctor-info__name">@lang('Иванов Иван Иванович')</h2>
            <ul class="doctor-info__tags">
                <li class="doctor-info__tag">@lang('главный врач,')</li>
                <li class="doctor-info__tag">@lang('учредитель,')</li>
                <li class="doctor-info__tag">@lang('главный врач')</li>
            </ul>

            <p class="doctor-info__descr">Создатель клиники, автор популярных курсов для врачей-стоматологов «Мастерство протезирования» и «Реконструкция улыбки», человек, собравший вокруг себя команду стоматологов, состоящую из лучших специалистов в своем деле.</p>

            <blockquote class="doctor-quote">
                <div class="doctor-quote__icon">
                    <span class="icon icon--circle icon--fill icon--quotes"></span>
                </div>

                @lang('“Мы стараемся услышать каждого пациента и помочь ему, а также разобраться
                    в причинах заболеваний, подобрать индивидуальный и оптимальный метод
                лечения и профилактики.”')
            </blockquote>

            <ul class="doctor-info__features">
                @foreach ($doctor_features as $item)
                    <li class="doctor-info__features__item">
                        <span class="icon icon--circle-big icon--{{$item['icon']}} doctor-info__fatures__icon"></span>
                        <p class="doctor-info__features__text">
                            {{$item['text']}}
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>

        <img src="{{ asset('img/doctors/Samofalov1.jpg') }}" alt="Фото врача" class="doctor-info__photo">
    </div>

