import Errors from './Errors';

class Form {

    /**
     * Create a new form instance
     * 
     * @param {object} data 
     */
    constructor(data) {
        this.originalData = data;
        this.loading = false;

        for (const field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors;
    }

    /**
     * Fetch all releveant data for the form
     */
    data() {
        let data = {};

        for (const property in this.originalData) {
            data[property] = this[property];
        }
        return data;    
    }
    
    /**
     * Reset the form fields
     */
    reset() {
        for (const field in this.originalData) {
            if(!Array.isArray(this[field])){
                this[field] = '';
            }else{
                this[field] = [];
            }
            
        }
        this.errors.clear();
    }

    /**
     * Send a POST request to given url
     * 
     * @param {string} url 
     */
    post(url) {
        return this.submit('post', url);
    }

    /**
     * Send a PUT request to given url
     * 
     * @param {string} url 
     */
    put(url) {
        return this.submit('put', url);
    }

    /**
     * Send a PATCH request to given url
     * 
     * @param {string} url 
     */
    patch(url) {
        return this.submit('patch', url);
    }

    /**
     * Send a DELETE request to given url
     * 
     * @param {string} url 
     */
    delete(url) {
        return this.submit('delete', url);
    }
    /**
     * Submit the form
     * 
     * @param {string} requestType 
     * @param {string} url 
     */
    submit(requestType, url) {
        return new Promise((resolve, reject) => {
            this.loading = true;
            axios[requestType](url, this.data())
                .then(response => {
                    this.onSuccess(response.data);
                    this.loading = false;
                    resolve(response.data);
                })
                .catch(error =>{
                    this.onFail(error.response.data);
                    this.loading = false;                    
                    reject(error.response.data);
                });
        });
    }

    /**
     * Handle a successfull form submission
     * 
     * @param {object} data 
     */
    onSuccess(data) {
        this.reset();
    }

    /**
     * Handle a failed form submission
     * 
     * @param {object} errors 
     */
    onFail(errors) {
        this.errors.record(errors);
    }

    /**
     * Redirect to a given URL
     * 
     * @param {string} url 
     */
    redirectTo(url) {
        window.location = url;
    }
}

export default Form;