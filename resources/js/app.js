import './bootstrap'

import Alpine from 'alpinejs'
import carousel from './carousel'
import location from './location'
import user from './user'
// import selectOrAdd from './selectOrAdd'
import nav from './nav'
import fileupload from './fileupload'
import carcreate from './car/create'
import userregister from './auth/register'
import makecreate from './make/create'
import modelcreate from './model/create'
// import selectOrAdd from './selectOrAdd'

window.Alpine = Alpine

Alpine.data('userregister', userregister)
Alpine.data('fileupload', fileupload)
Alpine.store('location', location)
Alpine.store('user', user)
// Alpine.store('tabs', selectOrAdd)
Alpine.data('carousel', carousel)
Alpine.data('nav', nav)
Alpine.data('carcreate', carcreate)
Alpine.data('makecreate', makecreate)
Alpine.data('modelcreate', modelcreate)


Alpine.start()
