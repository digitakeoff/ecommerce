import './bootstrap'

import Alpine from 'alpinejs'
import carousel from './carousel'
import location from './location'
import user from './user'
import nav from './nav'
import fileupload from './fileupload'
import productcreate from './product/create'
import productedit from './product/edit'
import userregister from './auth/register'
import brandedit from './brand/edit'
import brandcreate from './brand/create'
import modelcreate from './model/create'
import modeledit from './model/edit'
import usercreate from './user/create'
import useredit from './user/edit'
import loan from './loancal'
// import imagecreate from './image/create'


window.Alpine = Alpine

Alpine.data('loan', loan)
Alpine.data('userregister', userregister)
Alpine.data('fileupload', fileupload)
// Alpine.data('imagecreate', imagecreate)
Alpine.store('location', location)
Alpine.store('user', user)

Alpine.data('carousel', carousel)
Alpine.data('nav', nav)
Alpine.data('productcreate', productcreate)
Alpine.data('productedit', productedit)
Alpine.data('brandedit', brandedit)
Alpine.data('brandcreate', brandcreate)
Alpine.data('modelcreate', modelcreate)
Alpine.data('modeledit', modeledit)
Alpine.data('usercreate', usercreate)
Alpine.data('useredit', useredit)

Alpine.start()
