import { call, put, takeEvery } from 'redux-saga/effects';

import { storage } from '@/shared/services/firebase';
import { getExtension, getMd5 } from '@/shared/helpers/files';

import types from './types';

export function* upload({ payload }) {
    const { file } = payload;
    const $storage = storage.ref();

    const fileMd5 = yield call(getMd5, file);
    const filename = `${fileMd5}.${getExtension(file.name)}`;

    const $picture = $storage.child(`avatars/${filename}`);
    const uploaderTask = $picture.put(file);

    const handleSnapshot = snapshot => {
        const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
        yield put({
            payload: {
                progress,
                uploading: true,
            },
            type: types.AVATAR_UPLOAD_PROGRESS
        });
    };

    const handleError = error => {
        yield put({
            payload: {
                error,
                progress: 0,
                uploading: false,
            },
            type: types.AVATAR_UPLOAD_FAILURE
        });
    };

    const handleSuccess = () => {
        $picture.getDownloadURL().then(picture => {
            yield put({
                payload: {
                    picture,
                    progress: 0,
                    uploading: false,
                },
                type: types.AVATAR_UPLOAD_SUCCESS
            });
        });
    };

    uploaderTask.on('state_changed', handleSnapshot, handleError, handleSuccess);
}

export default function* avatars() {
    yield takeEvery(types.AVATAR_UPLOAD, upload);
}
