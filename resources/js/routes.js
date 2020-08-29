import Dashboard from './components/Dashboard.vue'
import Developer from './components/Developer.vue'
import UserAgent from './components/UserAgent.vue'
import Profile from './components/Profile.vue'
import Invite from './components/Invite.vue'

export const routes = [{
        path: '/',
        component: Profile
    },
    {
        path: '/developer',
        component: Developer
    },
    {

        path: '/user_agent',
        component: UserAgent
    },

    {

        path: '/invite',
        component: Invite
    },

];
