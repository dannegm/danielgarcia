import homeRoutes from './Home/routes';
import adminRoutes from './Admin/routes';
import errorsRoutes from './Errors/routes';
import exterlanRoutes from './Externals/routes';

export const Routes = [
    // breakline
    ...homeRoutes,
    ...adminRoutes,
    ...errorsRoutes,
    ...exterlanRoutes,
];
