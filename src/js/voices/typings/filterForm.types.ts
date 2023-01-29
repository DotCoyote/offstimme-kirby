export interface SelectedFilters {
  [key: string]: string | null;

  voiceAge: string | null;
  voiceStyle: string | null;
  gender: string | null;
  language: string | null;
  searchText: string;
}
