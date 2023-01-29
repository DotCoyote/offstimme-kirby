import { VoiceFile } from './voiceFile.types';

export namespace Voice {
  // eslint-disable-next-line no-shadow
  enum Sex {
    FEMALE = 'female',
    MALE = 'male',
    DIVERSE = 'diverse',
  }

  interface Image {
    back: string;
    color: string;
    cover: boolean;
    icon: string;
    ratio: string;
  }

  interface VoiceProbeFile {
    id: string;
    image: Image;
    info: string;
    link: string;
    sortable: boolean;
    text: string;
    uuid: string;
    filename: string;
    dragText: string;
    type: string;
    url: string;
  }

  interface VoiceProbe {
    file: VoiceProbeFile[];
    flag: string;
    language: string;
  }

  export interface Content {
    sex: Sex;
    isvip: boolean;
    showcase: boolean;
    language: string;
    country: string;
    countryflag1: Image[];
    countryflag2: Image[];
    voiceprobes: VoiceProbe[];
    image: Image[];
    voicestyle: string[];
    voiceage: string[];
    title: string;
    uuid: string;
  }

  export interface BASE {
    content: Content;
    files: VoiceFile.BASE[];
  }
}
