import './bootstrap'

import Alpine from 'alpinejs'
import carousel from './carousel'
import location from './location'
import user from './user'
import nav from './nav'
import fileupload from './fileupload'
import carcreate from './car/create'
import userregister from './auth/register'
import makeedit from './make/edit'
import makecreate from './make/create'
import modelcreate from './model/create'
import modeledit from './model/edit'
import usercreate from './user/create'
import useredit from './user/edit'
import bodycreate from './body/create'
import bodyedit from './body/edit'


window.Alpine = Alpine

Alpine.data('userregister', userregister)
Alpine.data('fileupload', fileupload)
Alpine.store('location', location)
Alpine.store('user', user)

Alpine.data('carousel', carousel)
Alpine.data('nav', nav)
Alpine.data('carcreate', carcreate)
Alpine.data('makeedit', makeedit)
Alpine.data('makecreate', makecreate)
Alpine.data('modelcreate', modelcreate)
Alpine.data('modeledit', modeledit)
Alpine.data('usercreate', usercreate)
Alpine.data('useredit', useredit)
Alpine.data('bodycreate', bodycreate)
Alpine.data('bodyedit', bodyedit)


window.Alpine.start()
