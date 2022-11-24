import './bootstrap'

import Alpine from 'alpinejs'
import carousel from './carousel'
import location from './location'
import fileupload from './fileupload'
import carcreate from './car/create'
import makecreate from './make/create'
import modelcreate from './model/create'

window.Alpine = Alpine

Alpine.data('fileupload', fileupload)
Alpine.store('location', location)
Alpine.data('carousel', carousel)
Alpine.data('carcreate', carcreate)
Alpine.data('makecreate', makecreate)
Alpine.data('modelcreate', modelcreate)


Alpine.start()
