const development = require('./.webpack/config.dev');
const production = require('./.webpack/config.prod');

module.exports = () => {
    if (process.env.NODE_ENV === 'production') {
        return production;
    }
    return development;
};
