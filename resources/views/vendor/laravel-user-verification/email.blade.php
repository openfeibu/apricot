点击验证: <a href="{{ $link = route('pc.email-verification.check', $user->verification_token) . '?email=' . urlencode($user->email) }}">{{ $link }}</a>
