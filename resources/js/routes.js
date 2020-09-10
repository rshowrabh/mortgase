import Dashboard from './components/Dashboard.vue'
import Developer from './components/Developer.vue'
import UserAgent from './components/UserAgent.vue'
import Brokerage from './components/Brokerage.vue'
import Agent from './components/Agent.vue'
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

        path: '/brokerage',
        component: Brokerage
    },
    {

        path: '/agent',
        component: Agent
    },

    {

        path: '/invite',
        component: Invite
    },

];
