import '../../../assets/dist/styles.css';

import { startStimulusApp } from '@symfony/stimulus-bundle';
import { FilemanagerController } from '@mezcalito/ux-filemanager';

const app = startStimulusApp();

app.register('mezcalito--ux-filemanager--filemanager', FilemanagerController);
