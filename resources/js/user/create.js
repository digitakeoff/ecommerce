export default () => ({
    first_name:'',
    last_name:'',
    email:'',
    role:'',
    slug:'',
    phone:'',
    state:'',
    city:'',
    address:'',
    password:'',
    
    errors: null,

    init(){
        
        const data = JSON.parse(localStorage.getItem('data')) || {}
        console.log(data)
        for(let key in data){
            if(data[key] != '')
                this[key] = data[key]
        }
        
        const els = document.querySelectorAll('[x-model]')
        var ap = this
        // Array.from(els).forEach(el => {
        //     el.addEventListener('focus', function(e){
        //         e.target.classList.remove('border-red-500')
        //         ap.errors = null
        //     })
        // })

        Array.from(els).forEach(el => {
            el.addEventListener('change', ap.onchange)
        })
    },


    onchange(e){
        const data = JSON.parse(localStorage.getItem('data'))||{}
        data[e.target.getAttribute('x-model')] = e.target.value
        localStorage.setItem(e.target.getAttribute('x-model'), e.target.value)
        localStorage.setItem('data', JSON.stringify(data))
        console.log(JSON.parse(localStorage.getItem('data')))
    },

    handleOnSubmit(){
        var ap = this
        const data = JSON.parse(localStorage.getItem('data'))||{}

        const els = document.querySelectorAll('[x-model]')
        Array.from(els).forEach(el => {
            if(!el.value){
                el.classList.add('border-red-500')
            }
        });

        // const els = document.querySelectorAll('[x-model]')
        // Array.from(els).forEach(el => {
        //     el.addEventListener('change', ap.onchange)
        // })

       
        
        const formData = new FormData
        for (let key in data){
            formData.append(key, data[key])
        }

        window.axios.post('/users', formData).then(({data}) => {
            localStorage.removeItem('state')
            localStorage.removeItem('city')
            localStorage.removeItem('data')
        }).catch((error) => {
            ap.errors = error.response.data.errors
        })
    }

})