<?php

use \Tsugi\Util\U;

function buildMenu() {
    global $CFG;
    $R = $CFG->apphome . '/';
    $T = $CFG->wwwroot . '/';
    $adminmenu = isset($_COOKIE['adminmenu']) && $_COOKIE['adminmenu'] == "true";
    $showCalendarDueUi = isset($_SESSION['id'])
        && U::isNotEmpty($CFG->lessons)
        && \Tsugi\Grades\GradeUtil::showDueDates(U::get($_SESSION, 'context_id', 0));
    $set = new \Tsugi\UI\MenuSet();
    $set->setHome($CFG->servicename, $CFG->apphome);

    if ( isset($CFG->lessons) ) {
        $set->addLeft('Lessons', $R.'lessons');
        if ( isset($_SESSION['id']) ) {
            $set->addLeft('Assignments', $R.'assignments');
        }
        $set->addLeft('Courses', $R.'coursesredirect.php');
    } else {
        $set->addLeft('Courses', $R.'coursesredirect.php');
    }

    if ( isset($_SESSION['id']) ) {
        $submenu = new \Tsugi\UI\Menu();
        $submenu->addLink('Profile', $R.'profile');
        if ( isset($CFG->google_map_api_key) ) {
            $submenu->addLink('Map', $R.'map');
        }
        if ( isset($CFG->badge_path)  ) {
            $submenu->addLink('Badges', $R.'badges');
        }
        if ( file_exists('materials.php') ) {
            $submenu->addLink('Materials', $R.'materials');
        }
        if ( file_exists('privacy.php') ) {
            $submenu->addLink('Privacy', $R.'privacy');
        }
        if ( $CFG->providekeys ) {
            $submenu->addLink('LMS Integration', $T . 'settings');
        }
        if ( isset($CFG->google_classroom_secret) ) {
            $submenu->addLink('Google Classroom', $T.'gclass/login');
        }
        $submenu->addLink('Free App Store', 'https://www.tsugicloud.org');
        if ( $CFG->DEVELOPER ) {
            $submenu->addLink('Test LTI Tools', $T . 'dev');
        }
        $submenu->addLink('Test Tools', $T.'store');
        if ( isset($_COOKIE['adminmenu']) && $_COOKIE['adminmenu'] == "true" ) {
            $submenu->addLink('Administer', $T . 'admin/');
        }
        $submenu->addLink('Logout', $R.'logout');
        if ( isset($_SESSION['avatar']) ) {
            $set->addRight('<img src="'.$_SESSION['avatar'].'" title="'.htmlentities(__('User Profile Menu - Includes logout')).'" style="height: 2em;"/>', $submenu);
            // htmlentities($_SESSION['displayname']), $submenu);
        } else {
            $set->addRight(htmlentities($_SESSION['displayname']), $submenu);
        }
    } else {
        // $set->addLeft('Autograder', $T.'store');
        if ( isset($CFG->google_client_id) && $CFG->google_client_id ) {
            $set->addRight('Login', $R.'login');
        }
    }
    if ( isset($_SESSION['id']) ) {
        if ( $showCalendarDueUi ) {
            $set->addRight(
                '<tsugi-calendar-due api-url="'. htmlspecialchars($R . 'calendar/json') . '" lessons-url="'. htmlspecialchars($R . 'lessons') . '"></tsugi-calendar-due>',
                false,
                true,
                'hidden-xs tsugi-wc-nav-item'
            );
        }
        if ( isset($CFG->tdiscus) && $CFG->tdiscus ) {
            $set->addRight(
                '<tsugi-discussions api-url="'. htmlspecialchars($R . 'discussions/json') . '" discussions-url="'. htmlspecialchars($R . 'discussions') . '"></tsugi-discussions>',
                false,
                true,
                'hidden-xs tsugi-wc-nav-item'
            );
        }
    }

    return $set;
}
