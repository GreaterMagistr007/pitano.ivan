<header class="header header--mobile" data-sticky="true">
    <div class="navigation--mobile">
        <div class="navigation__left">
            <a class="ps-logo" href="/" style="white-space: nowrap;white-space: nowrap;font-size: 18px;">
                Metall S.P.
            </a>
        </div>
        <div class="ps-block--header-hotline inline">
            <p style="font-size: 13px;text-align: end;">
                <a href="tel:{{$Contacts->phone_1}}">
                    <strong> {{$Contacts->phone_1}}</strong>
				</a>
				@if($Contacts->phone_2)
					</br>
					<a href="tel:{{$Contacts->phone_2}}">
						<strong> {{$Contacts->phone_2}}</strong>
					</a>
				@endif
            </p>
        </div>
    </div>
</header>
