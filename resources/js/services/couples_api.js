export const CoupleApi = () => {
    const baseUrlImage = 'http://127.0.0.1:8000/storage/'
    const getImageUrl = (imagePath) => {
        return baseUrlImage + imagePath;
    }
    return { getImageUrl }
}