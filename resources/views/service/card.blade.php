<div class="service">
    <span class="icon icon--circle-big service__icon"
          style="background-image: url({{ optional($service->icon)->getUrl() }})"></span>

    <a href="{{ $service->path() }}" class="service__img">
        <img src="{{ optional($service->image)->getUrl('catalog') }}" width="270" height="200" alt="photo">
        <p class="service__name">{{ $service->title }}</p>
    </a>

    <div class="service__text">{!! $service->description !!}</div>
</div>