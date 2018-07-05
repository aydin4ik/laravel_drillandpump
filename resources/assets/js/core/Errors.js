class Errors{
    /**
     * Create a new Errors instance.
     */
    constructor () {
        this.errors = {}
    }

    /**
     * Check if an error exists for the given field
     * 
     * @param {string} field 
     */
    has(field) {
        return this.errors.hasOwnProperty(field)
    }

    /**
     * Check if we have any errors
     */
    any() {
        return Object.keys(this.errors).length > 0;
    }

    /**
     * Get an error message for a field
     * 
     * @param {string} field
     */
    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }

    /**
     * Record new errors
     * 
     * @param {object} errors 
     */
    record(errors) {
        this.errors = errors.errors;
    }
    /**
     * clear one error field or all errors if field is not given 
     * 
     * @param {sting|null} field 
     */
    clear(field) {
        if (field) {
            delete this.errors[field];
            return
        }

        this.errors = {}
    }

}

export default Errors;