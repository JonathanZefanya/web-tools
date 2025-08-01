<?php


namespace Altum\Controllers;


use Altum\Title;

defined('ZEFANYA') || die();

class Plan extends Controller {

    public function index() {

        if(!settings()->payment->is_enabled) {
            redirect('not-found');
        }

        $type = isset($this->params[0]) && in_array($this->params[0], ['renew', 'upgrade', 'new']) ? $this->params[0] : 'new';

        /* If the user is not logged in when trying to upgrade or renew, make sure to redirect them */
        if(in_array($type, ['renew', 'upgrade']) && !is_logged_in()) {
            redirect('plan/new');
        }

        

        /* Set a custom title */
        Title::set(l('plan.header_' . $type));

        /* Plans View */
        $data = [];

        $view = new \Altum\View('partials/plans', (array) $this);

        $this->add_view_content('plans', $view->run($data));


        /* Prepare the view */
        $data = [
            'type' => $type
        ];

        $view = new \Altum\View('plan/index', (array) $this);

        $this->add_view_content('content', $view->run($data));

    }

}
