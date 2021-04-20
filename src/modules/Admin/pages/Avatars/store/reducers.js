import types from './types';
import initialState from './state';

const reducers = (payload) => ({
    [types.AVATAR_UPLOAD]: {
        uploadingSuccess: true,
    },
});

const makeReducers = (state = initialState, action) => {
    if (!(action.type in reducers)) {
        return state;
    }

    return {
        ...state,
        ...reducers(action.payload)[action.type],
    };
};

export default makeReducers;
