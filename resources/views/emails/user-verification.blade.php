Klik hier om uw e-mailadres te verifieren: <a href="{{ $link = route('account.email.verificate.token', $user->verification_token) . '?email=' . urlencode($user->email) }}">{{ $link }}</a>