import { spawn } from 'redux-saga/effects';

import adminSagas from '@/modules/Admin/store/sagas';

export default function* rootSaga() {
    yield spawn(adminSagas);
}
