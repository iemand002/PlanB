<p>Iemand heeft voor u een wachtwoord reset aangevraagd op "<a href="{{url(route('home'))}}">{{trans('common.sitenaam')}}</a>".</p>
<p>Als u dit niet was, verwijder dan a.u.b. deze mail.</p>
<p>Klik op volgende link op uw wachtwoord te resetten: <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> Reset wachtwoord </a>
