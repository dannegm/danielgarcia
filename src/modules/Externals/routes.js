import React from 'react';
import { Navigate } from 'react-router-dom';

import links from './links';

const exact = true;

const mapLinkToRedirect = (link) => ({
    name: `external.${link.name}`,
    path: link.path,
    Element: () => <Navigate replace to={link.url} />,
    exact,
});

const routes = links.map(mapLinkToRedirect);

export default routes;
