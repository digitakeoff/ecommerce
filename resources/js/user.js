export default {

    init() {
        window.axios.get('/user').then(({data}) => {
            localStorage.setItem('user', JSON.stringify(data))
        })
    },
 
}