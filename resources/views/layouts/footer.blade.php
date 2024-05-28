<footer class="sections-footer">
    <div class="section-footer">
        <div class="section-logo">
            <a class="logo-link" href="{{ route('home') }}">
                {{__('_app.logo.tele')}}<span class="x-logo">X</span>{{__('_app.logo.phony')}}
            </a>
        </div>
        <div class="footer-actions">
            <div class="section-footer-contact">
                <p class="footer-title">{{__('_layout.header.contact-us')}}:</p>
                <ul class="footer-contact-list">
                    <li>
                        <p>{{__('_layout.footer.email')}} : <a class="footer-contact-link" href="mailto:mohammadasaadgo@gmail.com"><bdi>mohammadasaadgo@gmail.com</bdi></a></p>
                    </li>
                    <li>
                        <p>{{__('_layout.footer.linkedin')}} : <a class="footer-contact-link" href="https://www.linkedin.com/in/moasaad/"><bdi>@moasaad</bdi></a></p>
                    </li>
                    <li>
                        <p>{{__('_layout.footer.github')}} : <a class="footer-contact-link" href="https://github.com/moassaad"><bdi>@moassaad</bdi></a></p>
                    </li>
                    <li>
                        <p>{{__('_layout.footer.phone')}} : <a class="footer-contact-link" href="tel:+201015086145"><bdi>+2010 1508 6145</bdi></a></p>
                    </li>
                    
                </ul>
            </div>
            <div class="section-footer-menu">
                <p class="footer-title">{{__('_layout.footer.menu')}}:</p>
                <ul class="footer-menu-list">
                    <li><a class="footer-menu-link" href="{{ route('home') }}">{{__('_layout.header.home')}}</a></li>
                    <li><a class="footer-menu-link" href="{{ route('about') }}">{{__('_layout.header.about')}}</a></li>
                    <li><a class="footer-menu-link" href="{{ route('contact-us') }}">{{__('_layout.header.contact-us')}}</a></li>
                    <li><a class="footer-menu-link" href="{{ route('help') }}">{{__('_layout.header.help')}}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="section-copyright">
        <section class="copyright">
            <p class="copyright-statement"> {{__('_layout.footer.all-copy-r')}} &copy {{__('_layout.footer.name')}}</p>
        </section>
    </div>
</footer>
{{-- @once
    @push('scripts') --}}
        <script src="/assets/scripts/app.js"></script>
    {{-- @endpush
@endonce --}}