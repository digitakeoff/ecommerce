export default () => ({
    images: [],
    num_of_images: 10,
    imgIndex: 0,

    init() {
        this.images = JSON.parse(localStorage.getItem('images')) || []
        this.imgIndex = JSON.parse(localStorage.getItem('imgIndex'))
    },

    handleDeleteImage(image){
        const imgIndex = this.images.findIndex(img => img.url == image.url)
        this.images.splice(imgIndex, 1)
        localStorage.setItem('images', JSON.stringify(this.images))
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
                    this.images.push(data);
                    localStorage.setItem('images', JSON.stringify(this.images))
                })
            }
        })
    },
})