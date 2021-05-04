import homeRoutes from './Home/routes';
import errorsRoutes from './Errors/routes';
import exterlanRoutes from './Externals/routes';

export const Routes = [
    // breakline
    ...homeRoutes,
    ...errorsRoutes,
    ...exterlanRoutes,
];
