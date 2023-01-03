export interface PharmacyInterface {
  pharmacies?: {
    id: Number
    name: String
    address: String
    lat?: String
    lon?: String
  }[]
}
