import { spawn } from 'redux-saga/effects';

import avatarsSagas from '../pages/Avatars/store/sagas';

export default function* adminSaga() {
    yield spawn(avatarsSagas);
}
