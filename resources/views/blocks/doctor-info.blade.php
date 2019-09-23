<div class="container doctor-info">
    <div class="doctor-info__content">
        <h2 class="title doctor-info__name">{{ $doctor->name }}</h2>
        <ul class="doctor-info__tags">
            <li class="doctor-info__tag">{{ $doctor->specialization }}</li>
        </ul>

        <p class="doctor-info__descr">{{ $doctor->description }}</p>

        @if($doctor->quote)
            <blockquote class="doctor-quote">
                <div class="doctor-quote__icon">
                    <span class="icon icon--circle icon--fill icon--quotes"></span>
                </div>

                {{ $doctor->quote }}
            </blockquote>
        @endif

        @if ($doctor->features)
            <ul class="doctor-info__features">
                @foreach ($doctor->features as $feature)
                    <li class="doctor-info__features__item">
                        @isset($feature['icon'])
                            <span class="icon icon--circle-big icon--doctor-{{ $feature['icon'] ?? '' }} doctor-info__fatures__icon"></span>
                        @endisset
                        <p class="doctor-info__features__text">
                            {{ $feature['text'] }}
                        </p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="doctor-info__photo-box">
        <h2 class="title doctor-info__name doctor-info__name--hidden">{{ $doctor->name }}</h2>
        <ul class="doctor-info__tags doctor-info__tags--hidden">
            <li class="doctor-info__tag">{{ $doctor->specialization }}</li>
        </ul>

        @if ($doctor->image)
            <img src="{{ $doctor->image->getUrl('info-main') }}" alt="{{ $doctor->name }}" width="370"
                 class="doctor-info__photo">
        @endif
    </div>
</div>


@include('blocks.doctor-experience', ['doctor' => $doctor])
