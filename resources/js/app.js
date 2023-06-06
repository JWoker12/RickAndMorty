import './bootstrap';
import { createApp } from 'vue';
const app = createApp({});

import HomeComponent from './components/HomeComponent.vue';
import CharacterComponent from './components/CharacterComponent.vue';
import ProfileComponent from './components/ProfileComponent.vue';

app.component('home-component', HomeComponent);
app.component('characater-component', CharacterComponent);
app.component('profile-component', ProfileComponent);

app.mount('#app');
