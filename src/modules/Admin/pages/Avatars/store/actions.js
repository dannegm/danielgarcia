import types from './types';

export const upload = () => ({
    payload: { isUploading: true },
    type: types.AVATAR_UPLOAD,
});
