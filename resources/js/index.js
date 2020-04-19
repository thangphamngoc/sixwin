// Views
// import profile from './components/about/profile'
// import home_default from './components/home/home_default'

export const routes = [
	{ name: 'home', props: true,path: '/', component: require('./components/home/home_default.vue').default },
	{ name: 'text-to-speech', props: true,path: '/text-to-speech', component: require('./components/home/home_default.vue').default },
	{ name: 'detail-task',path: '/detail-task', component: require('./components/home/detailTask.vue').default },
    { name: 'profile', props: true, path: '/profile', component: require('./components/about/profile.vue').default },
];