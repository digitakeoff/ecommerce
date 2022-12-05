export default {

    init() {
        window.axios.get('/user').then(({data}) => {
            localStorage.setItem('user', JSON.stringify(data))
        }).catch((error) => {
            // console.log(error.response.data.errors)
        })
    },
 
}