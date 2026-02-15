<?php

// Create a class alias for Agent if jenssegers/agent is not installed
if (!class_exists('Jenssegers\Agent\Agent')) {
    class_alias('App\Helpers\Agent', 'Agent');
}
