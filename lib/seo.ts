import type { Metadata } from "next";

const siteName = "Aurelia Studio";
const defaultTitle = "Aurelia Studio | Luxury Digital Experiences";
const defaultDescription = "A premium agency experience with cinematic storytelling, immersive interfaces, and exceptional product craftsmanship.";

export function buildMetadata(overrides: Partial<Metadata> = {}): Metadata {
  return {
    title: {
      default: defaultTitle,
      template: `%s | ${siteName}`,
    },
    description: defaultDescription,
    metadataBase: new URL("https://example.com"),
    openGraph: {
      title: defaultTitle,
      description: defaultDescription,
      type: "website",
      siteName,
      locale: "en_US",
    },
    twitter: {
      card: "summary_large_image",
      title: defaultTitle,
      description: defaultDescription,
    },
    alternates: {
      canonical: "/",
    },
    ...overrides,
  };
}
