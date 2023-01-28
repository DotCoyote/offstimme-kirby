export namespace VoiceFile {
  export interface Image {
    back: string;
    color: string;
    cover: boolean;
    icon: string;
    ratio: string;
    url: string;
    src: string;
    srcset: string;
  }

  export interface Countryflag {
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

  export interface Content {
    language: string;
    countryflag: Countryflag[];
    uuid: string;
    template: string;
  }

  export interface Dimensions {
    dimensions?: any;
  }

  export interface Next {
    filename: string;
    id: string;
    link: string;
    type: string;
    url: string;
  }

  export interface Options {
    changeName: boolean;
    create: boolean;
    delete: boolean;
    read: boolean;
    replace: boolean;
    update: boolean;
  }

  export interface Parent {
    id: string;
    num: number;
    title: string;
    url: string;
  }

  export interface Prev {
    filename: string;
    id: string;
    link: string;
    type: string;
    url: string;
  }

  export interface BASE {
    content: Content;
    dimensions: Dimensions;
    exists: boolean;
    extension: string;
    filename: string;
    id: string;
    link: string;
    mime: string;
    modified: Date;
    name: string;
    next: Next;
    niceSize: string;
    options: Options;
    parent: Parent;
    prev: Prev;
    size: number;
    template: string;
    type: string;
    url: string;
    uuid: string;
  }
}
