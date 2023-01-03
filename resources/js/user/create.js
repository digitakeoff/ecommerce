export default () => ({
    first_name:'',
    last_name:'',
    email:'',
    role:'',
    slug:'',
    phone:'',
    state_id:'',
    city_id:'',
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

        const els = document.querySelectorAll('[x-model]')
        Array.from(els).forEach(el => {
            if(!el.value){
                el.classList.add('border-red-500')
            }
        });

        const formData = new FormData
        Array.from(els).forEach(el => {
            formData.append(el.getAttribute('x-model'),  document.querySelector('[x-model='+el.getAttribute('x-model')).value)
        })

        window.axios.post('/users', formData).then(({data}) => {
            console.log(data)
            localStorage.clear()
        }).catch((error) => {
            ap.errors = error.response.data.errors
        })
    }
})