点击验证: <a href="<?php echo e($link = route('pc.email-verification.check', $user->verification_token) . '?email=' . urlencode($user->email)); ?>"><?php echo e($link); ?></a>
