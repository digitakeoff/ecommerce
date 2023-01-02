export default () => ({
    images: [],
    num_of_images: 10,
    imgIndex: 0,

    init() {
        var ap = this
        try {
            this.images = JSON.parse(localStorage.getItem('images')||'[]')
        } catch(e) {
            // localStorage.removeItem('images')
        }
        // console.log(this.images)
        this.imgIndex = JSON.parse(localStorage.getItem('imgIndex'))
    },

    handleDeleteImage(image){
        
        if(image.hasOwnProperty('url')){
            let imgIndex = this.images.findIndex(img => img.url == image.url)
            this.images.splice(imgIndex, 1)
            localStorage.setItem('images', JSON.stringify(this.images))
        }

        if(image.hasOwnProperty('src')){
            window.axios.delete(`/images/${image.id}`).then(({data})=>{
                location.reload()
                console.log(data)
            })
        }
        
    },

    selectedIndex(index){
        this.imgIndex = index
        localStorage.setItem('imgIndex', index)
    },

    handleOnChange(e){
        const formData = new FormData();
        const fileList = e.target.files;
        Array.from(fileList).forEach((file, index) => {      
            if(this.images.length < this.num_of_images){
                formData.append('file', file);
                    
                window.axios.post('/fileupload', formData).then(({data})=>{
                    this.images.push(data)
                    localStorage.setItem('images', JSON.stringify(this.images))
                    // console.log(this.images)
                })
            }
        })
    },
})